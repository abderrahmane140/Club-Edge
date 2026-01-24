<?php

use Src\Repositories\ArticleRepository;
class ArticleController
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }


    public function store(): void
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if (
            empty($data['club_id']) ||
            empty($data['event_id']) ||
            empty($data['title']) ||
            empty($data['content'])
        ) {
            http_response_code(400);
            echo json_encode(['message' => 'Missing fields']);
            return;
        }

        $success = $this->articleRepository->create(
            $data['club_id'],
            $data['event_id'],
            $data['title'],
            $data['content']
        );

        if ($success) {
            http_response_code(201);
            echo json_encode(['message' => 'Article created successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to create article']);
        }
    }

 
    public function index(): void
    {
        $articles = $this->articleRepository->getAll();

        header('Content-Type: application/json');
        echo json_encode([
            'total' => count($articles),
            'articles' => $articles
        ]);
    }
}
