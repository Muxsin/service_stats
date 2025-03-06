<?php

namespace app\controllers;

use app\models\Project;
use yii\helpers\Json;
use yii\web\Controller;

class ProjectController extends Controller
{
    public function actionStats()
    {
        // Поскольку в техническом задании не была указана разработка функционала логина/регистрации, текущий пользователь задается вручную через переменную.
        $currentUser = 'Иван Иванов';

        $projects = Project::find()
            ->joinWith('services')
            ->where(['author' => $currentUser])
            ->groupBy('projects.id')
            ->having('COUNT(services.id) > 2')
            ->all();
        
        $serviceStats = [];

        foreach ($projects as $project) {
            foreach ($project->services as $service) {
                if (!isset($serviceStats[$service->name])) {
                    $serviceStats[$service->name] = [
                        'totalQuantity' => 0,
                        'totalCost' => 0,
                    ];
                }
                $serviceStats[$service->name]['totalQuantity'] += $service->quantity;
                $serviceStats[$service->name]['totalCost'] += $service->quantity * $service->price;
            }
        }

        uasort($serviceStats, function ($a, $b) {
            return $b['totalCost'] - $a['totalCost'];
        });
        $topServices = array_slice($serviceStats, 0, 3);

        return Json::encode($topServices);
    }
}
