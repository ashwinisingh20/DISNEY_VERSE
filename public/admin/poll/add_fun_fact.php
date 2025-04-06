<?php
$conn = new mysqli("localhost", "root", "", "disney");

// 🛑 Handle delete FIRST and stop further output
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = intval($_POST['delete_id']);
    $conn->query("DELETE FROM fun_facts WHERE id = $id");
    echo "success";
    exit; // 🔥 prevent any more output like HTML
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if (!empty($title) && !empty($content)) {
        $stmt = $conn->prepare("INSERT INTO fun_facts (title, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $content);
        $stmt->execute();
        $message = "✅ Fun Fact added successfully!";
        $stmt->close();
    } else {
        $message = "⚠️ Please fill in both the title and fun fact.";
    }
}

$result = $conn->query("SELECT * FROM fun_facts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DisneyVerse Admin - Fun Facts</title>
   
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #fddde6, #f9f3ff);
        }

        header {
            background: #50276e;
            color: white;
            padding: 20px 40px;
            text-align: center;
            font-size: 28px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        h2 {
            color: #50276e;
        }

        .message {
            padding: 12px 20px;
            background: #e8e0ff;
            color: #50276e;
            border-left: 5px solid #8e44ad;
            margin-bottom: 20px;
            border-radius: 6px;
            font-weight: bold;
        }

        form {
            margin-bottom: 40px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            resize: vertical;
        }

        button {
            background: #50276e;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #6d3d8e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fefefe;
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #efdbf8;
            color: #50276e;
        }

        .delete-btn {
            color: #d10000;
            text-decoration: none;
            font-weight: bold;
        }

        .delete-btn:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            header {
                font-size: 22px;
                padding: 15px;
            }

            .container {
                padding: 20px;
            }

            th, td {
                font-size: 14px;
            }

            button {
                width: 100%;
            }
        }
    </style>

</head>
<body>
    <header>DisneyVerse Admin Panel - Fun Facts ✨</header>
    <div class="container">
        <h2>Add a New Fun Fact</h2>

        <?php if ($message): ?>
            <div class="message"><?= $message ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Title:</label>
            <input type="text" name="title" placeholder="e.g., Mickey Mouse’s First Words" required>

            <label>Fun Fact:</label>
            <textarea name="content" rows="4" placeholder="e.g., Mickey’s first words were actually ‘Hot Dogs!’ in a 1929 cartoon." required></textarea>

            <button type="submit" name="add">Add Fun Fact</button>
        </form>

        <h3>Existing Fun Facts</h3>
        <table id="factsTable">
            <tr>
                <th>Title</th>
                <th>Fact</th>
                <th>Action</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr data-id="<?= $row['id'] ?>">
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['content']) ?></td>
                <td><button class="delete-btn" data-id="<?= $row['id'] ?>">Delete</button></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                if (!confirm('Are you sure you want to delete this?')) return;

                const id = this.dataset.id;
                const row = this.closest('tr');

                fetch("", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `delete_id=${id}`
                })
                .then(res => res.text())
                .then(response => {
                    if (response.trim() === "success") {
                        row.remove();
                    } else {
                        alert("Failed to delete. Please try again.");
                    }
                });
            });
        });
    </script>
</body>
</html>
