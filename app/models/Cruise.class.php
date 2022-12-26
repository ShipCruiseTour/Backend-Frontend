<?php
class Cruise
{   
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getPosts()
    {
        $this->db->query('SELECT * FROM posts');
        $posts = $this->db->fetchAll();
        if ($posts)
            return $posts;
        else
            return false;
    }
    public function getPost($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        $post = $this->db->fetch();
        if ($post)
            return $post;
        else
            return false;
    }

    public function updatePost($post)
    {
        $this->db->query('UPDATE posts SET postTitle = :title , postContent = :content WHERE id=:id');
        $this->db->bind(':title', $post['title']);
        $this->db->bind(':content', $post['body']);
        $this->db->bind(':id', $post['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function deletePost($id)
    {
        $this->db->query('DELETE FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function addPost($post)
    {
        $this->db->query("INSERT INTO posts (postTitle, postContent, userId) VALUES (:title, :body, :userId)");
        $this->db->bind(':title', $post['title']);
        $this->db->bind(':body', $post['body']);
        $this->db->bind(':userId', $post['userId']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    public function edit($id)
    {
        
    }
}