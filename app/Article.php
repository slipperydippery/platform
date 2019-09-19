<?php

namespace App;

use App\Theme;
use App\Question;
use App\Articletype;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

	protected $guarded = [];

    public function themes()
    {
    	return $this->belongsToMany(Theme::class);
    }

    public function articletypes()
    {
    	return $this->belongsToMany(Articletype::class);
    }

    public function questions()
    {
    	return $this->belongsToMany(Question::class);
    }

    public static function register($attributes)
    {
        $order = Article::get()->count() + 1;

        $article = Article::create([
            'title' => $attributes->title,
            'description' => $attributes->description,
            'imagenumber' => $attributes->imagenumber,
            'linktype' => $attributes->linktype,
            'link' => $attributes->link,
            'order' => $order,
        ]);

        if($attributes->year) {
            $article->year = $attributes->year;
        }

        $article->articletypes()->sync( map_array_to_attribute($attributes->articletypes, 'id') );
        $article->questions()->sync( map_array_to_attribute($attributes->questions, 'id') );

        return $article;
    }

    public static function registerFile($article, $file)
    {
        $file->storeAs('public/pdfs/' . $article->id . '/', $file->getClientOriginalName());
        $article->link = 'storage/pdfs/' . $article->id . '/' . $file->getClientOriginalName();
        $article->save();

        return $article;
    }

    public function amend($attributes)
    {
        $this->title = $attributes->title;
        $this->description = $attributes->description;
        $this->imagenumber = $attributes->imagenumber;
        $this->year = $attributes->year;
        $this->linktype = $attributes->linktype;
        $this->link = $attributes->link;
        $this->order = $attributes->order;
        $this->save();        

        $this->articletypes()->sync( map_array_to_attribute($attributes->articletypes, 'id') );
        $this->questions()->sync( map_array_to_attribute($attributes->questions, 'id') );
        
    }
}
