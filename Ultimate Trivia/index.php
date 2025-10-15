<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Quest: The Ultimate Trivia Challenge</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            color: #4a4a4a;
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        header {
            text-align: center;
            margin-bottom: 30px;
            padding: 25px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #e1e4e8;
        }
        
        h1 {
            color: #3a506b;
            margin-bottom: 10px;
            font-size: 2.5rem;
            font-weight: 700;
        }
        
        .tagline {
            color: #5c6b7e;
            font-size: 1.2rem;
            margin-bottom: 20px;
            font-weight: 500;
        }
        
        .main-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }
        
        @media (max-width: 900px) {
            .main-content {
                grid-template-columns: 1fr;
            }
        }
        
        .card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.06);
            margin-bottom: 25px;
            border: 1px solid #e1e4e8;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f2f5;
        }
        
        h2 {
            color: #3a506b;
            font-size: 1.5rem;
            font-weight: 600;
        }
        
        .icon {
            background: #6c63ff;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
        .form-group {
            margin-bottom: 18px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #5c6b7e;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #d1d9e6;
            border-radius: 8px;
            font-size: 1rem;
            background: #fafbfc;
            transition: all 0.3s;
        }
        
        input:focus, select:focus, textarea:focus {
            border-color: #6c63ff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.1);
            background: #fff;
        }
        
        button {
            background: #6c63ff;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        button:hover {
            background: #554fd8;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(108, 99, 255, 0.2);
        }
        
        .btn-secondary {
            background: #4a9d84;
        }
        
        .btn-secondary:hover {
            background: #3d8570;
            box-shadow: 0 4px 8px rgba(74, 157, 132, 0.2);
        }
        
        .btn-danger {
            background: #e74c3c;
        }
        
        .btn-danger:hover {
            background: #c0392b;
            box-shadow: 0 4px 8px rgba(231, 76, 60, 0.2);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            border-radius: 8px;
            overflow: hidden;
        }
        
        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #eef2f7;
        }
        
        th {
            background-color: #5c6b7e;
            color: white;
            font-weight: 600;
        }
        
        tr {
            transition: background-color 0.2s;
        }
        
        tr:hover {
            background-color: #f8f9fc;
        }
        
        .leaderboard {
            background: linear-gradient(to bottom, #5c6b7e, #3a506b);
            color: white;
            border: none;
        }
        
        .leaderboard h2 {
            color: white;
        }
        
        .leaderboard .icon {
            background: white;
            color: #5c6b7e;
        }
        
        .leaderboard-item {
            display: flex;
            justify-content: space-between;
            padding: 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: background-color 0.2s;
        }
        
        .leaderboard-item:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .leaderboard-rank {
            font-size: 1.5rem;
            font-weight: bold;
            color: #4a9d84;
            min-width: 30px;
        }
        
        .leaderboard-name {
            flex-grow: 1;
            padding-left: 15px;
            font-weight: 600;
        }
        
        .leaderboard-score {
            font-size: 1.2rem;
            font-weight: bold;
            color: #4a9d84;
        }
        
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 5px;
        }
        
        .badge-easy {
            background: #4a9d84;
            color: white;
        }
        
        .badge-medium {
            background: #e9b949;
            color: #333;
        }
        
        .badge-hard {
            background: #e74c3c;
            color: white;
        }
        
        .search-form {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 12px;
        }
        
        @media (max-width: 600px) {
            .search-form {
                grid-template-columns: 1fr;
            }
        }
        
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            background: #4a9d84;
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: translateX(100%);
            transition: transform 0.3s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
        }
        
        .notification i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        .notification.show {
            transform: translateX(0);
        }
        
        .tab-container {
            margin-top: 20px;
        }
        
        .tabs {
            display: flex;
            border-bottom: 2px solid #e1e4e8;
            margin-bottom: 20px;
        }
        
        .tab {
            padding: 12px 22px;
            cursor: pointer;
            background: #f0f2f5;
            border-radius: 6px 6px 0 0;
            margin-right: 5px;
            font-weight: 600;
            color: #5c6b7e;
            transition: all 0.3s;
        }
        
        .tab:hover {
            background: #e4e8f0;
        }
        
        .tab.active {
            background: #5c6b7e;
            color: white;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .stagger-item {
            opacity: 0;
            transform: translateY(10px);
            animation: slideUp 0.5s ease forwards;
        }
        
        /* Add some spacing improvements */
        .left-column, .right-column {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Quiz Quest: The Ultimate Trivia Challenge</h1>
            <p class="tagline">Test your knowledge, enhance your memory, and make learning fun!</p>
            <p>Welcome, Trivia Master! Manage your quiz questions, rounds, and scores with ease.</p>
        </header>
        
        <div class="main-content">
            <div class="left-column">
                <div class="card">
                    <div class="card-header">
                        <h2>Create Quiz Questions</h2>
                        <div class="icon"><i class="fas fa-question-circle"></i></div>
                    </div>
                    <div class="form-group">
                        <label for="question">Question</label>
                        <textarea id="question" rows="3" placeholder="Enter your trivia question"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="difficulty">Difficulty Level</label>
                        <select id="difficulty">
                            <option value="easy">Easy</option>
                            <option value="medium">Medium</option>
                            <option value="hard">Hard</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="format">Question Format</label>
                        <select id="format">
                            <option value="multiple">Multiple Choice</option>
                            <option value="open">Open Ended</option>
                        </select>
                    </div>
                    <div id="multiple-choice-options">
                        <div class="form-group">
                            <label>Option 1</label>
                            <input type="text" placeholder="Enter option text">
                        </div>
                        <div class="form-group">
                            <label>Option 2</label>
                            <input type="text" placeholder="Enter option text">
                        </div>
                        <div class="form-group">
                            <label>Option 3</label>
                            <input type="text" placeholder="Enter option text">
                        </div>
                        <div class="form-group">
                            <label>Option 4</label>
                            <input type="text" placeholder="Enter option text">
                        </div>
                        <div class="form-group">
                            <label>Correct Answer</label>
                            <select>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                                <option value="4">Option 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="points">Points</label>
                        <input type="number" id="points" min="1" value="10">
                    </div>
                    <button class="btn-secondary">Add Question</button>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h2>Manage Quiz Rounds</h2>
                        <div class="icon"><i class="fas fa-tasks"></i></div>
                    </div>
                    <div class="form-group">
                        <label for="round-name">Round Name</label>
                        <input type="text" id="round-name" placeholder="Enter round theme">
                    </div>
                    <div class="form-group">
                        <label for="time-limit">Time Limit (seconds)</label>
                        <input type="number" id="time-limit" min="10" value="30">
                    </div>
                    <div class="form-group">
                        <label for="select-questions">Select Questions</label>
                        <select id="select-questions" multiple size="5">
                            <option value="1">Which freezes faster: hot or cold water? <span class="badge badge-easy">Easy</span></option>
                            <option value="2">What is the name of the famous mountain in South Africa? <span class="badge badge-medium">Medium</span></option>
                            <option value="3">Who was the first black president of South Africa?  <span class="badge badge-easy">Easy</span></option>
                            <option value="4">What is the human body's largest organ? <span class="badge badge-medium">Medium</span></option>
                            <option value="5">What produces the majority of breathable air on earth? <span class="badge badge-hard">Hard</span></option>
                        </select>
                    </div>
                    <button class="btn-secondary">Create Round</button>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h2>Search Past Scores</h2>
                        <div class="icon"><i class="fas fa-search"></i></div>
                    </div>
                    <div class="search-form">
                        <div class="form-group">
                            <label for="player-name">Player Name</label>
                            <input type="text" id="player-name" placeholder="Enter player name">
                        </div>
                        <div class="form-group">
                            <label for="quiz-date">Quiz Date</label>
                            <input type="date" id="quiz-date">
                        </div>
                        <div class="form-group">
                            <label for="search-difficulty">Difficulty Level</label>
                            <select id="search-difficulty">
                                <option value="">All Levels</option>
                                <option value="easy">Easy</option>
                                <option value="medium">Medium</option>
                                <option value="hard">Hard</option>
                            </select>
                        </div>
                    </div>
                    <button>Search Scores</button>
                    
                    <div class="tab-container">
                        <div class="tabs">
                            <div class="tab active" data-tab="results">Search Results</div>
                            <div class="tab" data-tab="update">Update Scores</div>
                            <div class="tab" data-tab="delete">Delete Data</div>
                        </div>
                        
                        <div class="tab-content active" id="results">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Player</th>
                                        <th>Score</th>
                                        <th>Date</th>
                                        <th>Difficulty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tasha Brown</td>
                                        <td>30</td>
                                        <td>2025-08-03</td>
                                        <td><span class="badge badge-medium">Medium</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ciara Jones</td>
                                        <td>85</td>
                                        <td>2025-08-08</td>
                                        <td><span class="badge badge-medium">Medium</span></td>
                                    </tr>
                                    <tr>
                                        <td>Michael Jordan</td>
                                        <td>70</td>
                                        <td>2025-06-14</td>
                                        <td><span class="badge badge-hard">Hard</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="tab-content" id="update">
                            <div class="form-group">
                                <label for="select-score">Select Score to Update</label>
                                <select id="select-score">
                                    <option value="1">Tasha Brown -30 (2025-08-03)</option>
                                    <option value="2">Ciara Jones - 85 (2025-08-08)</option>
                                    <option value="3">Michael Jordan - 70 (2025-06-14)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="new-score">New Score</label>
                                <input type="number" id="new-score" min="0" value="85">
                            </div>
                            <button>Update Score</button>
                        </div>
                        
                        <div class="tab-content" id="delete">
                            <div class="form-group">
                                <label for="delete-option">Select Data to Delete</label>
                                <select id="delete-option">
                                    <option value="question">Delete a Question</option>
                                    <option value="round">Delete a Round</option>
                                    <option value="score">Delete a Score</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="delete-item">Select Item to Delete</label>
                                <select id="delete-item">
                                    <option value="1">Which freezes first: hot or cold water?</option>
                                    <option value="2">What is the human body's largest organ?</option>
                                    <option value="3">What is the name of the famous mountain in South Africa?</option>
                                </select>
                            </div>
                            <button class="btn-danger">Delete Selected Item</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="right-column">
                <div class="card leaderboard">
                    <div class="card-header">
                        <h2>Live Leaderboard</h2>
                        <div class="icon"><i class="fas fa-trophy"></i></div>
                    </div>
                    <div class="leaderboard-item">
                        <div class="leaderboard-rank">1</div>
                        <div class="leaderboard-name">Kananelo Mokoena</div>
                        <div class="leaderboard-score">960</div>
                    </div>
                    <div class="leaderboard-item">
                        <div class="leaderboard-rank">2</div>
                        <div class="leaderboard-name">James Mkena</div>
                        <div class="leaderboard-score">950</div>
                    </div>
                    <div class="leaderboard-item">
                        <div class="leaderboard-rank">3</div>
                        <div class="leaderboard-name">Musa Moloi</div>
                        <div class="leaderboard-score">900</div>
                    </div>
                    <div class="leaderboard-item">
                        <div class="leaderboard-rank">4</div>
                        <div class="leaderboard-name">Katleho Makhetha</div>
                        <div class="leaderboard-score">880</div>
                    </div>
                    <div class="leaderboard-item">
                        <div class="leaderboard-rank">5</div>
                        <div class="leaderboard-name">Thembi Sefela</div>
                        <div class="leaderboard-score">800</div>
                    </div>
                    <div class="leaderboard-item">
                        <div class="leaderboard-rank">6</div>
                        <div class="leaderboard-name">Stunna Tiara</div>
                        <div class="leaderboard-score">760</div>
                    </div>
                    <div class="leaderboard-item">
                        <div class="leaderboard-rank">7</div>
                        <div class="leaderboard-name">Michael Bloom</div>
                        <div class="leaderboard-score">740</div>
                    </div>
                    <div class="leaderboard-item">
                        <div class="leaderboard-rank">8</div>
                        <div class="leaderboard-name">Taylor Johnson</div>
                        <div class="leaderboard-score">733</div>
                    </div>
                    <div class="leaderboard-item">
                        <div class="leaderboard-rank">9</div>
                        <div class="leaderboard-name">Johnny Brown</div>
                        <div class="leaderboard-score">600</div>
                    </div>
                    <div class="leaderboard-item">
                        <div class="leaderboard-rank">10</div>
                        <div class="leaderboard-name">Mariah Magdeline</div>
                        <div class="leaderboard-score">680</div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h2>Record Player Scores</h2>
                        <div class="icon"><i class="fas fa-scoreboard"></i></div>
                    </div>
                    <div class="form-group">
                        <label for="player">Player Name</label>
                        <input type="text" id="player" placeholder="Enter player name">
                    </div>
                    <div class="form-group">
                        <label for="quiz">Select Quiz</label>
                        <select id="quiz">
                            <option value="1">General Knowledge Round</option>
                            <option value="2">Science & Technology</option>
                            <option value="3">History Challenge</option>
                            <option value="4">Entertainment Trivia Round</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="score">Score</label>
                        <input type="number" id="score" min="0" placeholder="Enter score">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date">
                    </div>
                    <button>Record Score</button>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h2>Current Quiz Rounds</h2>
                        <div class="icon"><i class="fas fa-list-ol"></i></div>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Round Name</th>
                                <th>Questions</th>
                                <th>Time Limit</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>General Knowledge</td>
                                <td>5</td>
                                <td>30 sec</td>
                                <td>
                                    <button class="btn-secondary"><i class="fas fa-play"></i> Start</button>
                                    <button><i class="fas fa-edit"></i> Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Science & Tech</td>
                                <td>7</td>
                                <td>45 sec</td>
                                <td>
                                    <button class="btn-secondary"><i class="fas fa-play"></i> Start</button>
                                    <button><i class="fas fa-edit"></i> Edit</button>
                                </td>
                            </tr>
                            <tr>
                                <td>History Challenge</td>
                                <td>6</td>
                                <td>40 sec</td>
                                <td>
                                    <button class="btn-secondary"><i class="fas fa-play"></i> Start</button>
                                    <button><i class="fas fa-edit"></i> Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="notification" id="notification">
        Score updated successfully!
    </div>

    <script>
        // Tab functionality
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs and content
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                
                // Add active class to clicked tab
                tab.classList.add('active');
                
                // Show corresponding content
                const tabId = tab.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
        
        // Show notification function
        function showNotification(message) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.classList.add('show');
            
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }
        
        // Simulate form submissions
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', () => {
                // Don't submit the actual form (since we don't have backend)
                event.preventDefault();
                
                // Show success notification
                let message = "Action completed successfully!";
                
                if (button.textContent.includes("Add Question")) {
                    message = "Question added successfully!";
                } else if (button.textContent.includes("Create Round")) {
                    message = "Quiz round created successfully!";
                } else if (button.textContent.includes("Record Score")) {
                    message = "Player score recorded successfully!";
                } else if (button.textContent.includes("Update Score")) {
                    message = "Score updated successfully!";
                } else if (button.textContent.includes("Delete")) {
                    message = "Item deleted successfully!";
                } else if (button.textContent.includes("Search")) {
                    message = "Search completed!";
                }
                
                showNotification(message);
            });
        });
        
        // Toggle multiple choice options based on question format
        const formatSelect = document.getElementById('format');
        const multipleChoiceOptions = document.getElementById('multiple-choice-options');
        
        formatSelect.addEventListener('change', () => {
            if (formatSelect.value === 'multiple') {
                multipleChoiceOptions.style.display = 'block';
            } else {
                multipleChoiceOptions.style.display = 'none';
            }
        });
        
        // Initialize the page with current date
        document.getElementById('date').valueAsDate = new Date();
        document.getElementById('quiz-date').valueAsDate = new Date();
    </script>
</body>
</html>
