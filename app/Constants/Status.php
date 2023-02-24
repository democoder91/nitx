<?php
namespace App\Constants;

enum Status : string{
    case Ready = 'Ready';
    case Ended = 'Ended';
    case Live = 'Live';
    case NotReady = 'Not Ready';

}