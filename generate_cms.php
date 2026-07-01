<?php

$content = [
    'settings' => [
        'site_title' => 'Flxware Technologies',
        'contact_email' => 'hello@flxware.com',
        'address' => 'Colombo, Sri Lanka'
    ],
    'pages' => [
        'home' => [
            'hero' => [
                'tagline' => 'Innovative Software Solutions',
                'title_line_1' => 'Building Tomorrow\'s',
                'title_line_2' => 'Software Solutions',
                'description' => 'We\'re a passionate team of developers creating innovative software that transforms businesses and empowers growth.',
                'button_1_text' => 'View Our Work',
                'button_1_link' => '#portfolio',
                'button_2_text' => 'Get Started',
                'button_2_link' => '#contact'
            ],
            // More sections can be added here
        ]
    ],
    'projects' => [
        'passvault' => [
            'title' => 'PassVault',
            'client' => 'Internal Product',
            'type' => 'Mobile App',
            'problem' => 'Users struggle to maintain secure and unique passwords across multiple services, often resorting to weak, easily guessable passwords or reusing the same password, which compromises their digital security.',
            'solution' => 'We developed PassVault, a highly secure mobile application that generates unbreakable passwords, stores them in an encrypted vault accessible via biometric login, and syncs seamlessly across all user devices.',
            'results' => [
                'End-to-end encryption for maximum security',
                'Real-time cloud sync across platforms',
                'Intuitive and modern user interface'
            ],
            'images' => [
                'generate.png',
                'sync.png',
                'access.png',
                'reset.png',
                'create.png'
            ]
        ],
        'expense-tracker' => [
            'title' => 'Expense Tracker App',
            'client' => 'Personal Finance Startup',
            'type' => 'Mobile App',
            'problem' => 'The client wanted to create a simple, intuitive application for tracking daily expenses and managing personal budgets, but existing solutions were too complex and intimidating for average users.',
            'solution' => 'We designed and developed a clean, minimalist Flutter application with Firebase backend, focusing on a frictionless user experience with quick entry forms and clear visual charts.',
            'results' => [
                '10,000+ Downloads in the first month',
                '4.8 Star rating on App Store',
                '30% higher user retention than industry average'
            ]
        ],
        'exercise-tracker' => [
            'title' => 'Exercise Tracker',
            'client' => 'FitLife Health',
            'type' => 'Mobile App',
            'problem' => 'Users struggled to maintain consistency with their workouts because they lacked a personalized way to track progress and receive customized routines based on their fitness levels.',
            'solution' => 'Built a React Native application that leverages custom algorithms to recommend workouts, coupled with a robust logging system to visualize progress over time.',
            'results' => [
                '5,000+ Active daily users',
                'Featured in Health & Fitness category',
                'Increased average workout consistency by 25%'
            ]
        ],
        'wayz' => [
            'title' => 'Wayz - Vehicle Rental',
            'client' => 'Wayz Tourism',
            'type' => 'Web & Mobile Platform',
            'problem' => 'Tourists needed a reliable, localized vehicle rental solution that also provided integrated navigation and tourist guides to enhance their travel experience.',
            'solution' => 'Developed a comprehensive cross-platform ecosystem using Flutter and Node.js. The solution included seamless payment processing, GPS tracking, and a curated tourist guide module.',
            'results' => [
                '+ Revenue processed in Q1',
                'Expanded to 3 major tourist cities',
                'Reduced booking friction by 40%'
            ]
        ]
    ],
    'jobs' => [
        'software-engineer' => [
            'title' => 'Software Engineer (Fullstack)',
            'department' => 'Engineering',
            'location' => 'Onsite',
            'type' => 'Full-time',
            'about' => "Flxware Technologies is seeking a talented and driven Fullstack Software Engineer to become a core part of our engineering team. In this role, you will be instrumental in designing, developing, and deploying robust web applications that serve our global client base.\n\nYou will work across the entire technology stack, from crafting responsive and intuitive user interfaces with React and Next.js to architecting scalable backend services using Laravel, Node.js, and Java. We value cleaner code, innovative problem-solving, and a collaborative spirit. If you are passionate about building high-quality software and want to work in an environment that encourages growth and technical excellence, we want to hear from you.",
            'requirements' => [
                'BSc degree in Computer Science, Software Engineering, or related field.',
                '1+ years of professional experience in full-stack software development.',
                'Strong proficiency in backend technologies: Laravel (PHP), Node.js, and Java.',
                'Solid experience with frontend frameworks: React.js or Next.js.',
                'In-depth knowledge of SQL, database design, and optimization.',
                'Experience with cloud services (AWS) and CI/CD pipelines (e.g., GitHub Actions, Jenkins).',
                'Demonstrated ability to write clean, maintainable, and efficient code.',
                'Strong problem-solving skills, attention to detail, and ability to work in an agile environment.'
            ]
        ],
        'associate-software-engineer' => [
            'title' => 'Associate Software Engineer (Fullstack)',
            'department' => 'Engineering',
            'location' => 'Onsite',
            'type' => 'Full-time',
            'about' => "Start your career with impact as an Associate Software Engineer at Flxware. We are looking for promising developers who are eager to learn and ready to contribute to real-world projects.\n\nAs an Associate Engineer, you will work closely with senior mentors and cross-functional teams to build and maintain our software solutions. You will participate in code reviews, help debug complex issues, and gradually take ownership of features. This position offers a unique opportunity to refine your skills in a professional setting while working with a modern tech stack including Laravel, Node.js, and React.",
            'requirements' => [
                'BSc degree in Computer Science, Software Engineering, or related field.',
                'Completed a recognized software engineering internship or have relevant project experience.',
                'Solid understanding of core programming concepts and OOP principles.',
                'Basic proficiency in Laravel, Node.js, and Java.',
                'Familiarity with frontend development using React, Next.js, and SQL databases.',
                'Exposure to cloud platforms (AWS) and CI/CD concepts is a strong plus.',
                'A proactive attitude with a strong eagerness to learn and adapt to new technologies.',
                'Excellent communication skills and the ability to collaborate effective within a team.'
            ]
        ],
        'intern-software-engineer' => [
            'title' => 'Intern Software Engineer (Fullstack)',
            'department' => 'Engineering',
            'location' => 'Onsite',
            'type' => 'Internship',
            'about' => "Kickstart your journey in the tech industry with Flxware's Software Engineering Internship. We provide an immersive learning environment where you will gain hands-on experience in full-stack development.\n\nUnder the guidance of experienced engineers, you will assist in coding, testing, and debugging applications. You will be exposed to industry-standard practices and tools, giving you a solid foundation for your future career. This internship is designed for students who are passionate about technology and ready to apply their academic knowledge to practical challenges.",
            'requirements' => [
                'Current Undergraduate pursuing a degree in Computer Science, Software Engineering, or related field.',
                'Foundational knowledge of programming languages such as Java, JavaScript, or PHP.',
                'Strong interest in web development frameworks like React and Laravel.',
                'A fast learner with a genuine passion for technology and software development.',
                'Available for a minimum commitment of 6 months.'
            ]
        ],
        'intern-qa-engineer' => [
            'title' => 'Intern QA Engineer',
            'department' => 'QA',
            'location' => 'Onsite',
            'type' => 'Internship',
            'about' => "Quality is at the heart of what we do. We are seeking a detail-oriented Intern QA Engineer to join our Quality Assurance team. In this role, you will help ensure that our software products meet the highest standards of reliability and performance.\n\nYou will work alongside developers and QAs to perform manual and automated testing, identify bugs, and document issues. This role is perfect for someone with an analytical mindset who enjoys breaking things to make them better.",
            'requirements' => [
                'Current Undergraduate pursuing a degree in Computer Science, Software Engineering, or related field.',
                'Strong attention to detail and an analytical, problem-solving mindset.',
                'Basic understanding of software testing life cycle (STLC) and testing concepts.',
                'Familiarity with test automation tools or scripting is an advantage.',
                'Excellent written and verbal communication skills for effective bug reporting.'
            ]
        ],
        'intern-business-analyst' => [
            'title' => 'Intern Business Analyst',
            'department' => 'Product',
            'location' => 'Onsite',
            'type' => 'Internship',
            'about' => "Flxware is looking for an Intern Business Analyst to help bridge the gap between business needs and technical solutions. You will work with our product team to analyze requirements, document processes, and support data-driven decision-making.\n\nThis role involves gathering requirements from stakeholders, creating documentation, and helping to manage project backlogs. It's an excellent opportunity for students with a business or management background who are interested in the technology sector.",
            'requirements' => [
                'Current Undergraduate pursuing a degree in Business Management, IS, or related field.',
                'Strong analytical skills with the ability to document complex processes clearly.',
                'Proficiency in productivity tools (Microsoft Office / Google Workspace).',
                'Excellent communication and interpersonal skills to interact with various stakeholders.',
                'Ability to translate rough business needs into structured technical requirements.'
            ]
        ]
    ]
];

$dir = __DIR__ . '/storage/app/cms';
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}
file_put_contents($dir . '/content.json', json_encode($content, JSON_PRETTY_PRINT));
echo "CMS file generated successfully.\n";
