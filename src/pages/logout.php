<?php

declare(strict_types=1);                               // Use strict types

use StylistCommerce\CMS\Session;

Session::action()->delete();                            // Call method to end session
redirect('');                                            // Redirect to home page