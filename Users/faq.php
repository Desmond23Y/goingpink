<!DOCTYPE html>
<html>
<head>
    <title>Tourism FAQ - Malaysia</title>
    <style>
        /* Style for FAQ dropdowns */
        .faq-dropdown {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }

        /* Style for FAQ answers (initially hidden) */
        .faq-answer {
            display: none;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <?php
        include_once('../navi_bar.php');
    ?>
    <h1>Tourism FAQ - Malaysia</h1>
    
    <!-- FAQ Dropdown 1 -->
    <div class="faq-dropdown">
        <div onclick="toggleAnswer('answer1')">1. What are some popular tourist destinations in Malaysia?</div>
        <div id="answer1" class="faq-answer">
            <p>Some popular tourist destinations in Malaysia include:</p>
            <ul>
                <li>Kuala Lumpur (Capital City)</li>
                <li>Penang (George Town)</li>
                <li>Langkawi (Island)</li>
                <li>Malacca (Historical City)</li>
                <li>Borneo Rainforest (Sabah and Sarawak)</li>
                <!-- Add more destinations as needed -->
            </ul>
        </div>
    </div>

    <!-- FAQ Dropdown 2 -->
    <div class="faq-dropdown">
        <div onclick="toggleAnswer('answer2')">2. How do I obtain a tourist visa for Malaysia?</div>
        <div id="answer2" class="faq-answer">
            <p>Obtaining a tourist visa for Malaysia depends on your nationality. Many countries have visa-free or visa-on-arrival arrangements. You can also apply for a tourist visa through the Malaysian embassy or consulate in your home country.</p>
        </div>
    </div>

    <!-- FAQ Dropdown 3 -->
    <div class="faq-dropdown">
        <div onclick="toggleAnswer('answer3')">3. What are some local dishes I should try in Malaysia?</div>
        <div id="answer3" class="faq-answer">
            <p>Malaysia is known for its diverse and delicious cuisine. Some must-try dishes include:</p>
            <ul>
                <li>Nasi Lemak (Coconut Rice)</li>
                <li>Roti Canai (Flatbread)</li>
                <li>Char Kway Teow (Stir-Fried Noodles)</li>
                <li>Rendang (Spicy Meat Stew)</li>
                <li>Nasi Goreng (Fried Rice)</li>
            </ul>
        </div>
    </div>

    <script>
        // JavaScript function to toggle FAQ answers
        function toggleAnswer(answerId) {
            var answer = document.getElementById(answerId);
            if (answer.style.display === "block") {
                answer.style.display = "none";
            } else {
                answer.style.display = "block";
            }
        }
    </script>
</body>
</html>
