<?php

namespace App\Http\Livewire;

use App\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination;

    public $body;
    public $view = 'create';
    public $title;
    public $post_id;

    public function render()
    {
        return view('livewire.post-component',[
            'posts' => Post::orderBy('id','ASC')->paginate(8),
        ]);
    }

    public function store(){
        $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::create([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $this->edit($post->id);
    }

    public function edit($id){
        $post = Post::find($id);

        $this->post_id = $post->post_id;
        $this->title = $post->title;
        $this->body = $post->body;

        $this->view = 'edit';
    }

    public function update(){
        $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::find($this->post_id);

        $post->update([
            'title' => $this->title,
            'body' => $this->body
        ]);

        $this->default();
    }

    public function destroy($id){
        return Post::destroy($id);
    }

    public function default(){
        $this->title = '';
        $this->body = '';

        $this->view = 'create';
    }

}
