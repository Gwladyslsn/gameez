<?php
namespace App\Entity;

class ListEntity
{
    private ?int $idList;
    private string $nameList;
    private int $userId;
    private string $createdAt;

    public function __construct(?int $idList, string $nameList, int $userId, ?string $createdAt = null)
    {
        $this->idList = $idList;
        $this->nameList = $nameList;
        $this->userId = $userId;
        $this->createdAt = $createdAt ?? date('Y-m-d'); // par défaut la date du jour
    }



    /**
     * Get the value of idList
     */
    public function getIdList(): ?int
    {
        return $this->idList;
    }

    /**
     * Set the value of idList
     */
    public function setIdList(?int $idList): self
    {
        $this->idList = $idList;

        return $this;
    }

    /**
     * Get the value of nameList
     */
    public function getNameList(): string
    {
        return $this->nameList;
    }

    /**
     * Set the value of nameList
     */
    public function setNameList(string $nameList): self
    {
        $this->nameList = $nameList;

        return $this;
    }

    /**
     * Get the value of userId
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     */
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
