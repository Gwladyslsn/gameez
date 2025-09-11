<?php
namespace App\Entity;

class ReviewEntity
{
    private ?int $idReview;
    private int $reviewNote;
    private string $commentReview;
    private \DateTime $reviewDate;
    private int $idUser;
    private int $idGame;

    public function __construct(?int $idReview, int $reviewNote, string $commentReview, \DateTime $reviewDate, int $idUser, int $idGame)
    {
        $this->idReview = $idReview;
        $this->reviewNote = $reviewNote;
        $this->commentReview = $commentReview;
        $this->reviewDate = $reviewDate;
        $this->idUser = $idUser;
        $this->idGame = $idGame;

        
    }



    /**
     * Get the value of idReview
     */
    public function getIdReview(): ?int
    {
        return $this->idReview;
    }

    /**
     * Set the value of idReview
     */
    public function setIdReview(?int $idReview): self
    {
        $this->idReview = $idReview;

        return $this;
    }

    /**
     * Get the value of reviewNote
     */
    public function getReviewNote(): int
    {
        return $this->reviewNote;
    }

    /**
     * Set the value of reviewNote
     */
    public function setReviewNote(int $reviewNote): self
    {
        $this->reviewNote = $reviewNote;

        return $this;
    }

    /**
     * Get the value of commentReview
     */
    public function getCommentReview(): string
    {
        return $this->commentReview;
    }

    /**
     * Set the value of commentReview
     */
    public function setCommentReview(string $commentReview): self
    {
        $this->commentReview = $commentReview;

        return $this;
    }

    /**
     * Get the value of reviewDate
     */
    public function getReviewDate(): \DateTime
    {
        return $this->reviewDate;
    }

    /**
     * Set the value of reviewDate
     */
    public function setReviewDate(\DateTime $reviewDate): self
    {
        $this->reviewDate = $reviewDate;

        return $this;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     */
    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of idGame
     */
    public function getIdGame(): int
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
}