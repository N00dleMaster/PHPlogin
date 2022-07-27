<?php

// logout is very easy to do. Just start session, so the session var becoems available in this file, then end session.
session_start();
session_unset(); // unset all session vars
session_destroy(); // destroy the session
header("location: ../index.php?error=none");