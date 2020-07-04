<?php

class Institutos
{
    use ChargeView;
    public function bomberos()
    {
        $this->chargeView('templates/institutos/bomberos');
    }

    public function matadero()
    {
        $this->chargeView('templates/institutos/matadero-municipal');
    }
}
