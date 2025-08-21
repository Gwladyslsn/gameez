<?php 

namespace App\Entity;

class GameEntity
{
    private ?int $idGame = null;
    private string $nameGame;

    private string $durationGame;

    private string $nbGamer;

    private string $ageGamer;
    private string $imageGame;

    private string $descriptionGame;

    public function __construct(
        ?int $idGame = null,
        string $nameGame = '',
        string $durationGame = '',
        string $nbGamer = '',
        string $ageGamer = '',
        string $imageGame = '',
        ?string $descriptionGame = ''
    ) {
        $this->idGame = $idGame;
        $this->nameGame = $nameGame;
        $this->durationGame = $durationGame;
        $this->nbGamer = $nbGamer;
        $this->ageGamer = $ageGamer;
        $this->imageGame = $imageGame;
        $this->descriptionGame = $descriptionGame;
    }


    /**
     * Get the value of idGame
     */
    public function getIdGame(): ?int
    {
        return $this->idGame;
    }

    /**
     * Set the value of idGame
     */
    public function setIdGame(int $idGame): self
    {
        $this->idGame = $idGame;

        return $this;
    }

    /**
     * Get the value of nameGame
     */
    public function getNameGame(): string
    {
        return $this->nameGame;
    }

    /**
     * Set the value of nameGame
     */
    public function setNameGame(string $nameGame): self
    {
        $this->nameGame = $nameGame;

        return $this;
    }

    /**
     * Get the value of durationGame
     */
    public function getDurationGame(): string
    {
        return $this->durationGame;
    }

    /**
     * Set the value of durationGame
     */
    public function setDurationGame(string $durationGame): self
    {
        $this->durationGame = $durationGame;

        return $this;
    }

    /**
     * Get the value of nbGamer
     */
    public function getNbGamer(): string
    {
        return $this->nbGamer;
    }

    /**
     * Set the value of nbGamer
     */
    public function setNbGamer(string $nbGamer): self
    {
        $this->nbGamer = $nbGamer;

        return $this;
    }

    /**
     * Get the value of ageGamer
     */
    public function getAgeGamer(): string
    {
        return $this->ageGamer;
    }

    /**
     * Set the value of ageGamer
     */
    public function setAgeGamer(string $ageGamer): self
    {
        $this->ageGamer = $ageGamer;

        return $this;
    }

    /**
     * Get the value of imageGame
     */
    public function getImageGame(): string
    {
        return $this->imageGame;
    }

    /**
     * Set the value of imageGame
     */
    public function setImageGame(string $imageGame): self
    {
        $this->imageGame = $imageGame;

        return $this;
    }

    /**
     * Get the value of descriptionGame
     */
    public function getDescriptionGame(): string
    {
        return $this->descriptionGame;
    }

    /**
     * Set the value of descriptionGame
     */
    public function setDescriptionGame(string $descriptionGame): self
    {
        $this->descriptionGame = $descriptionGame;

        return $this;
    }
}