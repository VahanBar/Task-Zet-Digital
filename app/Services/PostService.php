<?php

namespace App\Services;

use App\Contracts\PostServiceInterface;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;

final class PostService implements PostServiceInterface
{
    public function __construct(
        protected PostRepository $postRepository
    ) {}
    public function getList(): Collection
    {
        return $this->postRepository->getList();
    }

    public function store(array $newPost): Post
    {
        return $this->postRepository->store($newPost);
    }

    public function show(int $id): Post
    {
        return $this->postRepository->show($id);
    }

    public function update(array $postUpdate): bool
    {
        $updatePost = [
            'id' => $postUpdate['id'],
            'title' => $postUpdate['title'],
            'body' => $postUpdate['body'],
            'user_id' => $postUpdate['user_id']
        ];

        return $this->postRepository->update($updatePost);
    }

    public function destroy(int $id): bool
    {
        return $this->postRepository->destroy($id);
    }
}
