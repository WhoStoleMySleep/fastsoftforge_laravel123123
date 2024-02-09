<?php

namespace App\View\Components\Projects;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $revert;
    public $link;
    public $img;
    public $name;
    public $about;
    public $technologies;

    public function __construct(
        $revert,
        $link,
        $img,
        $name,
        $about,
        $technologies
    )
    {
        $this->revert = $revert;
        $this->link = $link;
        $this->img = $img;
        $this->name = $name;
        $this->about = $about;
        $this->technologies = $technologies;
    }

    public function render(): View|Closure|string
    {
        return view('components.projects.card');
    }
}
