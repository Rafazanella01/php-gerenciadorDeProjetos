<?php
    require_once __DIR__ . '/../models/Project.php';

    class ProjectController
    {
        public function projectPage()
        {
            session_start();
            
            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

            $projectId = $_GET['project_id'];


        }

        public function projectsPage()
        {
            session_start();

            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

            $projectModel = new Project();
            $projects = $projectModel->getProjects();

            require_once __DIR__ . '/../views/projectsList.php';
        }

        public function registerProjectPage()
        {
            session_start();

            if (!isset($_SESSION['user_id'])) {
                header('Location: /sign-in');
                exit();
            }

            require_once __DIR__ . '/../views/registerProject.php';
        }

        public function createProject()
        {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $projectModel = new Project();

            $projectModel->createProject(new Project(null, $name, $description, $startDate, $endDate));

            header('Location: /projects');
            exit();
        }
    }
?>