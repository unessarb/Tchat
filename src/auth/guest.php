<?php
(isset($_SESSION['user_id']) && isset($_SESSION['name'])) && header("Location: /");