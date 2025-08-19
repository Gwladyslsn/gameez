<?php

namespace App\Entity;

class UserEntity
{
    private ?int $idUser;
    private string $userName;
    private string $userLastname;
    private string $userPhone;
    private string $userEmail;
    private ?string $userPassword = null;

    public function __construct(
        ?int $idUser = null,
        string $userName = '',
        string $userLastname = '',
        string $userPhone = '',
        string $userEmail = '',
        ?string $userPassword = null
    ) {
        $this->idUser = $idUser;
        $this->userName = $userName;
        $this->userLastname = $userLastname;
        $this->userPhone = $userPhone;
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(?int $idUser): self
    {
        $this->idUser = $idUser;
        return $this;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;
        return $this;
    }

    public function getUserLastname(): string
    {
        return $this->userLastname;
    }

    public function setUserLastname(string $userLastname): self
    {
        $this->userLastname = $userLastname;
        return $this;
    }

    public function getUserPhone(): string
    {
        return $this->userPhone;
    }

    public function setUserPhone(string $userPhone): self
    {
        $this->userPhone = $userPhone;
        return $this;
    }

    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    public function setUserEmail(string $userEmail): self
    {
        $this->userEmail = $userEmail;
        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->userPassword;
    }

    public function setUserPassword(?string $userPassword): self
    {
        $this->userPassword = $userPassword;
        return $this;
    }
}

