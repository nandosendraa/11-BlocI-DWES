<?php

class Twitter
{
    private array $tweets;
    private array $users;
    private int $numberOfTweets;
    private int $numberOfUsers;

    public function __construct(){

    }
    public function likeTweet(User $user, Tweet $tweet){

    }
    public function addTweet(Tweet $tweet){
        $this->tweets[]=$tweet;
    }
    public function addUser(User $user){
        $this->users[]=$user;
    }
    public function getTweets(): array
    {
        return $this->tweets;
    }
    public function setTweets(array $tweets): void
    {
        $this->tweets = $tweets;
    }
    public function getUsers(): array
    {
        return $this->users;
    }
    public function setUsers(array $users): void
    {
        $this->users = $users;
    }
    public function getNumberOfTweets(): int
    {
        $this->setNumberOfTweets(count($this->tweets));
        return $this->numberOfTweets;
    }
    public function setNumberOfTweets(int $numberOfTweets): void
    {
        $this->numberOfTweets = $numberOfTweets;
    }
    public function getNumberOfUsers(): int
    {
        $this->setNumberOfUsers(count($this->users));
        return $this->numberOfUsers;
    }
    public function setNumberOfUsers(int $numberOfUsers): void
    {
        $this->numberOfUsers = $numberOfUsers;
    }


}