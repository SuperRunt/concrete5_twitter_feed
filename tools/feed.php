<?php

    $blockObj = Block::getByID((int)$_REQUEST['bID']);
    $instance = $blockObj->getInstance();
    echo json_encode($instance->refreshFeed());