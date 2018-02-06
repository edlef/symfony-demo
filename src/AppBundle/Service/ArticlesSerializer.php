<?php

namespace AppBundle\Service;

use AppBundle\Entity\Article;

class ArticlesSerializer
{
    /**
     * @param $data
     * @return array
     * Serialize Articles into array
     */
    public function serialize($data) : array
    {

        if (is_array($data) && !empty($data)) {

            $objectToArray = [];
            foreach ($data as $article) {

                //log possible errors
                if ($article instanceof Article) {

                    $objectToArray[] = $this->serializeObject($article);

                }
            }

            return $objectToArray;

        }

        //log possible errors
        if ($data !== null && $data instanceof Article) {

            return $this->serializeObject($data);
        }

        return [];

    }

    /**
     * @param Article $article
     * @return array
     */
    public function serializeObject(Article $article) : array
    {


        $type = [
            'id' => $article->getType()->getId()
        ];

        $author = [
            'id' => $article->getAuthor()->getId()
        ];

        $actors = [];
        if (!$article->getActors()->isEmpty()) {
            foreach ($article->getActors() as $actor) {
                $actors[] = [
                    'id' => $actor->getId()
                ];
            }
        }

        $articleArray = [
            'id'          => $article->getId(),
            'code'        => $article->getCode(),
            'title'       => $article->getTitle(),
            'releaseDate' => ($article->getReleaseDate() != null) ? $article->getReleaseDate()->format('c') : null,
            'duration'    => $article->getDuration(),
            'description' => $article->getDescription(),
            'price'       => $article->getPrice(),
            'dvd'         => $article->isDvd(),
            'blueray'     => $article->isBlueray(),
            'type'        => $type,
            'author'      => $author,
            'actors'      => $actors,
            'createdAt'   => $article->getCreatedAt()->format('c'),
            'updatedAt'   => $article->getUpdatedAt()->format('c'),
        ];

        return $articleArray;
    }
}

