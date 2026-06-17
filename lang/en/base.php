<?php

return [

    'exception' => [
        'validation' => 'A validation error has occurred.',
        'token_mismatch' => 'Your validation token is invalid.',
        'query' => 'An error occurred in the provided query.',
        'swift_transport' => 'An error occurred while sending information.',
        'view' => 'An error occurred in the view page.',
        'internal_server' => 'An error occurred in your application.',
        'bad_request' => 'Invalid request.',
        'model_not_found' => 'The requested entity was not found.',
        'record_not_found' => 'The requested record was not found.',
        'oauth_server' => 'An error occurred while validating your request.',
        'authorization' => 'An authorization error occurred for your request.',
        'authentication' => 'An authentication error occurred for your request.',
        'method_not_allowed_http' => 'The requested method is not allowed.',
        'not_found_http' => 'The requested path was not found on the server.',
        'missing_scope' => 'You do not have access to this route.',
        'type_error' => 'The type of the sent parameter is invalid.',
        'throttle_request' => 'You have exceeded the request limit. Please wait a few minutes.',
        'backed_enum_case_not_found' => 'The specified enum case was not found.',
    ],

    'message' => [
        'succeed' => 'The operation was completed successfully.',
        'created' => 'The information was successfully saved.',
        'updated' => 'The information was successfully updated.',
        'deleted' => 'The information was successfully deleted.',
        'failed' => 'The operation was not successful, please try again.',
        'unauthorized' => 'You are not authorized to view this information.',
        'forbidden' => 'You are not authorized to view this information.',
        'accepted' => 'The operation was completed successfully.',
    ],

    'enums' => [
        'blog_order' => [
            'latest' => 'latest',
            'oldest' => 'oldest',
        ],
        'project_technology' => [
            'general' => 'general',
            'go_backend' => 'go backend',
            'laravel' => 'Laravel',
            'react' => 'React',
            'devops' => 'DevOps and Infrastructure',
        ],

        'project_type' => [
            'technical_consultation' => 'Technical Consultation',
            'project_scoping' => 'Project Scoping',
            'architecture_review' => 'Architecture Review',
            'technology_selection' => 'Tech Selection',

            'api_development' => 'API Development (Go)',
            'microservices' => 'Microservices',
            'backend_refactor' => 'Backend Refactor',
            'performance_optimization' => 'Performance Optimization',

            'custom_web_app' => 'Custom Web App',
            'ecommerce_development' => 'E-commerce Development',
            'cms_development' => 'CMS Development',
            'api_laravel' => 'Laravel API',

            'spa_development' => 'SPA Development',
            'pwa_development' => 'PWA Development',
            'ui_component_design' => 'UI Components',
            'frontend_integration' => 'Frontend Integration',

            'ci_cd_setup' => 'CI/CD Setup',
            'cloud_migration' => 'Cloud Migration',
            'container_orchestration' => 'Container Orchestration',
            'monitoring_setup' => 'Monitoring Setup',
        ],

        'project_expected_timing' => [
            'flexible' => 'Flexible / No preference',
            'asap' => 'ASAP (Less than 1 month)',
            'one_to_three_months' => '1 to 3 months',
            'three_to_six_months' => '3 to 6 months',
            'six_plus_months' => 'More than 6 months',
        ],

        'project_estimated_budget' => [
            'under_50m' => 'Less than 50 million Toman',
            'from_50m_to_100m' => '50 to 100 million Toman',
            'from_100m_to_200m' => '100 to 200 million Toman',
            'above_200m' => 'More than 200 million Toman',
            'not_sure' => 'Not sure yet',
        ],

        'how_to_get_to_know_us' => [
            'google' => 'Google search',
            'social' => 'Social networks',
            'friend' => 'Friend referral',
            'ads' => 'Advertisements',
            'other' => 'Other',
        ],

        'faq_category' => [
            'service' => 'service',
            'laravel' => 'laravel',
            'golang' => 'golang',
            'react' => 'react',
        ],
    ],

];
