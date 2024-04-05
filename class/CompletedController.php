<?php

    class CompletedController
    {
        public function markTaskAsCompleted($taskId)
        {
            $success = true;

            if($success) {
                $response = ['succes' => true];
            } else {
                $response = ['succes' => false];
            }
            header('Content-Type: application-json');
            json_response($response);
        }
    }

    