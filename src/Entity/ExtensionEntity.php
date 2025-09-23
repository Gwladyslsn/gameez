<?php

namespace App\Entity;

class ExtensionEntity
{
    private ?int $idExtension = null;
    private string $extensionName = '';
    private string $extensionDescription = '';
    private int $complexity = 0;
    private string $imageExtension = '';
    private ?\DateTime $releaseDate = null;
    private int $idGame = 0;
    private string $nameGame = '';

    public function __construct(
        ?int $idExtension = null,
        string $extensionName = '',
        string $extensionDescription = '',
        int $complexity = 0,
        string $imageExtension = '',
        ?\DateTime $releaseDate = null,
        int $idGame = 0,
        string $nameGame = ''
    ) {
        $this->idExtension = $idExtension;
        $this->extensionName = $extensionName;
        $this->extensionDescription = $extensionDescription;
        $this->complexity = $complexity;
        $this->imageExtension = $imageExtension;
        $this->releaseDate = $releaseDate;
        $this->idGame = $idGame;
        $this->nameGame = $nameGame;
    }

    public function getIdExtension(): ?int
    {
        return $this->idExtension;
    }

    public function setIdExtension(?int $idExtension): self
    {
        $this->idExtension = $idExtension;
        return $this;
    }

    public function getExtensionName(): string
    {
        return $this->extensionName;
    }

    public function setExtensionName(string $extensionName): self
    {
        $this->extensionName = $extensionName;
        return $this;
    }

    public function getExtensionDescription(): string
    {
        return $this->extensionDescription;
    }

    public function setExtensionDescription(string $extensionDescription): self
    {
        $this->extensionDescription = $extensionDescription;
        return $this;
    }

    public function getComplexity(): int
    {
        return $this->complexity;
    }

    public function setComplexity(int $complexity): self
    {
        $this->complexity = $complexity;
        return $this;
    }

    public function getImageExtension(): string
    {
        return $this->imageExtension;
    }

    public function setImageExtension(string $imageExtension): self
    {
        $this->imageExtension = $imageExtension;
        return $this;
    }

    public function getReleaseDate(): ?\DateTime
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTime $releaseDate): self
    {
        $this->releaseDate = $releaseDate;
        return $this;
    }

    public function getIdGame(): int
    {
        return $this->idGame;
    }

    public function setIdGame(int $idGame): self
    {
        $this->idGame = $idGame;
        return $this;
    }

    public function getNameGame(): string
    {
        return $this->nameGame;
    }

    public function setNameGame(string $nameGame): self // ✅ Corrigé: string au lieu de int
    {
        $this->nameGame = $nameGame;
        return $this;
    }
}

