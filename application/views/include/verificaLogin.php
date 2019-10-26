<?php
if (!isset($this->session->userdata['id_user'])) {
    redirect(base_url('login'));
}
?>