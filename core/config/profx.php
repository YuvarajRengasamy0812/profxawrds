<?php

// Admin panel scope for the PROFX Awards site.
// Anything not listed here is hidden from the sidebar and blocked by the BlockUnusedAdmin middleware.
return [

    // CMS sections (smartend_webmaster_sections.id) the website actually uses
    // 23 = gallery (/gallery page), 11 = Awards (/award page)
    'admin_sections' => [23, 11],

    // Admin URL prefixes (after /admin/) that are not used by this project
    'blocked_admin_paths' => [
        'analytics', 'visitors', 'ip',
        'banners', 'banners-settings',
        'calendar',
        'contacts',
        'webmails',
        'file-manager', 'files-manager',
        'menus',
        'popups',
        'tags',
        'modules',
        'topics-import',
    ],
];
