<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Feedback;
use App\Entity\Classe;
use App\Entity\Student;
use App\Entity\Course;
use App\Entity\QcmGeneration;
use App\Entity\QcmStudent;
use App\Entity\StudentResponse;
use App\Entity\LogsIa;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Create Users
        $users = [];
        for ($i = 0; $i < 3; $i++) {
            $user = new User();
            $user->setEmail($faker->unique()->email);
            $user->setMotDePasseHash(password_hash('password', PASSWORD_BCRYPT));
            $user->setRole('ROLE_ADMIN');
            $manager->persist($user);
            $users[] = $user;
        }

        // Create Classes
        $classes = [];
        foreach (['Seconde', 'Première', 'Terminale'] as $niveau) {
            $classe = new Classe();
            $classe->setNomClasse('Classe de ' . $niveau);
            $classe->setNiveau($niveau);
            $classe->setEnseignant($faker->randomElement($users));
            $manager->persist($classe);
            $classes[] = $classe;
        }

        // Create Students
        $students = [];
        for ($i = 0; $i < 10; $i++) {
            $student = new Student();
            $student->setNom($faker->lastName);
            $student->setPrenom($faker->firstName);
            $student->setClasse($faker->randomElement($classes));
            $manager->persist($student);
            $students[] = $student;
        }

        // Create Courses
        $courses = [];
        foreach (['Maths', 'Physique', 'Français'] as $titre) {
            $course = new Course();
            $course->setTitre($titre);
            $course->setFichierPdfUrl($faker->url);
            $course->setDateUpload(new \DateTimeImmutable());
            $course->setClasse($faker->randomElement($classes));
            $course->setNiveauScolaire($faker->randomElement(['Seconde', 'Première', 'Terminale']));
            $course->setObjectifPedagogique($faker->sentence);
            $manager->persist($course);
            $courses[] = $course;
        }

        // Create QCM Generations
        $generations = [];
        for ($i = 0; $i < 5; $i++) {
            $generation = new QcmGeneration();
            $generation->setCourse($faker->randomElement($courses));
            $generation->setDateGeneration(new \DateTimeImmutable());
            $generation->setStatus($faker->randomElement(['generated', 'in_progress', 'error']));
            $generation->setFichierDocxUrl($faker->url);
            $generation->setFichierPdfUrl($faker->url);
            $generation->setFichierCsvUrl($faker->url);
            $generation->setNiveauScolaire($faker->randomElement(['Seconde', 'Première', 'Terminale']));
            $generation->setObjectifPedagogique($faker->sentence);
            $manager->persist($generation);
            $generations[] = $generation;
        }

        // Create QCM Students
        foreach ($students as $student) {
            $qcmStudent = new QcmStudent();
            $qcmStudent->setStudent($student);
            $qcmStudent->setGeneration($faker->randomElement($generations));
            $qcmStudent->setFichierPersonnaliseUrl($faker->url);
            $manager->persist($qcmStudent);
        }

        // Create Student Responses
        foreach ($students as $student) {
            $response = new StudentResponse();
            $response->setStudent($student);
            $response->setQcmGeneration($faker->randomElement($generations));
            $response->setResponse($faker->text(100));
            $response->setScore($faker->randomFloat(2, 0, 20));
            $response->setAnalyse($faker->sentence);
            $manager->persist($response);
        }

        // Create Logs IA
        foreach ($generations as $generation) {
            $logIa = new LogsIa();
            $logIa->setGeneration($generation);
            $logIa->setTempsTraitement($faker->randomFloat(2, 0.5, 5.0));
            $logIa->setErreurs($faker->optional()->text(50));
            $logIa->setResultatIaSummary($faker->sentence);
            $manager->persist($logIa);
        }

        // Create Feedbacks
        foreach ($users as $user) {
            $feedback = new Feedback();
            $feedback->setUtilisateur($user);
            $feedback->setCommentaire($faker->text(100));
            $feedback->setNote($faker->numberBetween(1, 5));
            $feedback->setDate(new \DateTimeImmutable());
            $manager->persist($feedback);
        }

        $manager->flush();
    }
}
