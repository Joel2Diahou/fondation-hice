<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'url',
        'fichier',
        'thumbnail',
        'categorie',
        'est_publie'
    ];

    /**
     * Extraire l'ID d'une vidéo YouTube
     */
    public function getYoutubeIdAttribute()
    {
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $this->url, $matches);
        return $matches[1] ?? null;
    }

    /**
     * Vérifier si la vidéo est YouTube
     */
    public function getIsYoutubeAttribute()
    {
        return strpos($this->url, 'youtube.com') !== false || strpos($this->url, 'youtu.be') !== false;
    }

    /**
     * Vérifier si la vidéo est Vimeo
     */
    public function getIsVimeoAttribute()
    {
        return strpos($this->url, 'vimeo.com') !== false;
    }

    /**
     * Vérifier si la vidéo est un fichier uploadé
     */
    public function getIsFichierAttribute()
    {
        return !empty($this->fichier);
    }

    /**
     * Obtenir le lien d'intégration
     */
    public function getEmbedUrlAttribute()
    {
        if ($this->is_youtube) {
            $id = $this->youtube_id;
            return "https://www.youtube.com/embed/{$id}";
        } elseif ($this->is_vimeo) {
            $id = $this->vimeo_id;
            return "https://player.vimeo.com/video/{$id}";
        } elseif ($this->is_fichier) {
            return asset('storage/' . $this->fichier);
        }
        return $this->url;
    }

    /**
     * Obtenir le chemin de la vidéo uploadée
     */
    public function getVideoPathAttribute()
    {
        if ($this->fichier) {
            return asset('storage/' . $this->fichier);
        }
        return null;
    }
}
