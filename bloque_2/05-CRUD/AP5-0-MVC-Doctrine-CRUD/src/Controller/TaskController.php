<?php

namespace AP50\Controller;

use AP50\Core\EntityManager;
use AP50\Entity\Task;
use AP50\Repository\TaskRepository;
use AP50\View\MainView;
use AP50\View\TaskView;

class TaskController
{
    private EntityManager $entityManager;
    private TaskRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(Task::class);
    }

    /**
     * Lista todas las tareas
     *
     * @return void
     */
    public function list(): void
    {
        $tasks = $this->repository->findAll();
        $view = new TaskView();
        $view->list($tasks);
    }

    /**
     * Gestiona las operaciones CRUD según los parámetros recibidos
     *
     * Rutas disponibles:
     * - /task/create -> crear nueva tarea
     * - /task/read/{id} -> mostrar detalle de una tarea
     * - /task/update/{id} -> actualizar tarea existente
     * - /task/delete/{id} -> eliminar tarea
     *
     * @param mixed ...$params Array de parámetros donde $params[0] es la acción y $params[1] es el ID (opcional)
     * @return void
     */
    public function crud(...$params): void
    {
        $action = $params[0] ?? null;
        $id = $params[1] ?? null;

        switch ($action) {
            case 'create':
                $this->create();
                break;
            case 'read':
                $this->read($id);
                break;
            case 'update':
                $this->update($id);
                break;
            case 'delete':
                $this->delete($id);
                break;
            default:
                $this->noRuta();
        }
    }

    /**
     * Crea una nueva tarea
     *
     * Si recibe datos por POST, crea la tarea y redirige al listado.
     * Si no, muestra el formulario de creación.
     *
     * @return void
     */
    private function create(): void
    {
        if (isset($_POST['submit'])) {
            $task = new Task();
            $task->setTitle($_POST['title']);
            $task->setSlug(strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $_POST['title']), '-')));
            $task->setDescription($_POST['description']);
            // La fecha de creación la pone el controlador, no el formulario.
            $task->setCreationDate(new \DateTime('now'));
            $task->setDueDate(new \DateTime($_POST['dueDate'] ?? 'now'));

            $em = $this->entityManager->getEntityManager();
            $em->persist($task);
            $em->flush();

            $this->list();
        } else {
            $view = new TaskView();
            $view->form(false, null);
        }
    }

    /**
     * Actualiza una tarea existente
     *
     * Si recibe datos por POST, actualiza la tarea y redirige al listado.
     * Si no, muestra el formulario de edición con los datos actuales de la tarea.
     *
     * @param string|null $id ID de la tarea a actualizar
     * @return void
     */
    private function update(?string $id): void
    {
        $taskId = intval($id);
        $task = $this->repository->find($taskId);

        if (!$task) {
            $this->noRuta();
            return;
        }

        if (isset($_POST['submit'])) {
            if (!isset($_POST['title']) || !isset($_POST['description']) ||
                !isset($_POST['dueDate'])) {
                $this->noRuta();
                return;
            }

            // La fecha de creación no viene del formulario: se asignó al crear y no se modifica.
            $task->setTitle($_POST['title']);
            $task->setDescription($_POST['description']);
            $task->setDueDate(new \DateTime($_POST['dueDate']));

            $em = $this->entityManager->getEntityManager();
            $em->flush();

            $this->list();
        } else {
            $view = new TaskView();
            $view->form(true, $task);
        }
    }

    /**
     * Elimina una tarea
     *
     * Busca la tarea por ID, la elimina de la base de datos y redirige al listado.
     *
     * @param string|null $id ID de la tarea a eliminar
     * @return void
     */
    private function delete(?string $id): void
    {
        $taskId = intval($id);
        $task = $this->repository->find($taskId);

        if (!$task) {
            $this->noRuta();
            return;
        }

        $em = $this->entityManager->getEntityManager();
        $em->remove($task);
        $em->flush();

        $this->list();
    }

    /**
     * Muestra el detalle de una tarea
     *
     * Busca la tarea por ID y muestra su información detallada.
     *
     * @param string|null $id ID de la tarea a mostrar
     * @return void
     */
    private function read(?string $slug): void
    {
        $task = $this->repository->findOneBy(['slug' => $slug]);

        if (!$task) {
            $this->noRuta();
            return;
        }

        $view = new TaskView();
        $view->detail($task);
    }

    private function noRuta()
    {
        (new MainView())->error();
    }
}
