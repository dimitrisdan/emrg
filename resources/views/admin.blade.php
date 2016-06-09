@extends('layouts.app')

@section('content')
<?php
    foreach ($patients as $patient) {
        echo $patient->patientFirstName;
    }