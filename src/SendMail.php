<?php
    namespace peter\Scheduler;

    interface SendMail {
        public function fire($job, $data);
    }
