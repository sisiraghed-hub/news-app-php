<?php
class UIFacade {
    public function authenticate() {}
    public function managePatient() {}
    public function manageAppointment() {}
    public function manageBilling() {}
}

class AuthenticationManager {
    public function login() {}
}

class PatientManager {
    public function addPatient() {}
}

class AppointmentManager {
    public function createAppointment() {}
}

class BillingManager {
    public function generateBill() {}
}
?>
