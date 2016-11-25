<?php

return [
    'adminEmail' => 'admin@example.com',
		
		//WI Status
    'STATUS_OPEN' => 'OPEN',
    'STATUS_CLOSE' => 'CLOSE',
    'STATUS_CHECK_MASTERLIST' => 'CHECK MASTERLIST',
    'STATUS_CHECK_SMILE' => 'CHECK SMILE',
    'STATUS_CHECK1' => 'FINAL CHECK',
	'STATUS_WAITING_APP' => 'WAITING APPROVAL',
	'STATUS_CHECKIN' => 'CHECK IN',
    'STATUS_CHECKOUT' => 'CHECK OUT',
	'STATUS_REJECT' => 'REJECTED',
	'STATUS_APPROVED' => 'APPROVED',
		
		//Role ID
		'roleid_superadmin' => [1, 6],
		'roleid_wimaker' => 4,
		'roleid_admin1' => 5,
		'roleid_admin2' => 6,
		'roleid_checker' => 7,
		'roleid_approval' => 8,
		'roleid_rejector' => [5, 6, 7, 8],
];
