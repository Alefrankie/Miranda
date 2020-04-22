<?php

class Institutos extends AppController
{
    public function bomberos()
    {
        $this->view('templates/institutos/bomberos');
    }

    public function matadero()
    {
        $this->view('templates/institutos/matadero-municipal');
    }
}
