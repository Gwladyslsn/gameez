<?php 

namespace App\Controller;

use App\Database\Database;
use App\Repository\ListRepository;
use App\Repository\UserRepository;
use App\Repository\ReviewRepository;

class UserController extends Controller
{
    public function dashboardUser()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /register');
            exit;
        }

        $database = new Database();
        $pdo = $database->getConnection();
        $userRepo = new UserRepository($pdo);
        $listRepository = new ListRepository($pdo);
        $reviewRepo = new ReviewRepository($pdo);

        $user = $userRepo->getDataUser($_SESSION['user']);
        $lists = $listRepository->getListsByUser($_SESSION['user']);
        $nb_list = $listRepository->countListByUser($_SESSION['user']);
        $nb_games = $listRepository->countGamesByUser($_SESSION['user']);
        $nb_review = $reviewRepo->countReviewByUser($_SESSION['user']);
        $average_notes = $reviewRepo->getAverageReviewByUser($_SESSION['user']);
        $reviews = $reviewRepo->getReviewByUser($_SESSION['user']);

        foreach ($lists as &$list) {
        $list['games'] = $listRepository->getGamesByList($list['id_list']);
    }

        $this->render('View/page/dashboardUser', [
            'user' => $user,
            'lists' => $lists,
            'nb_list' => $nb_list,
            'nb_games' => $nb_games,
            'nb_review' => $nb_review,
            'average_notes' => $average_notes,
            'reviews' => $reviews
        ]);
    }
    }
