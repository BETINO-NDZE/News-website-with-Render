<?php
    // include "../include/connection.php"; // Ensure this is included in index.php as well

    $query = "SELECT * FROM tbl_addnews ORDER BY NEWS_ID DESC LIMIT 1";
    $data = pg_query($conn, $query);

    if (!$data) {
        die("Error in query: " . pg_last_error($conn));
    }

    while ($row = pg_fetch_assoc($data)) {
        $recenetNews_ID = $row["NEWS_ID"];
        $recentNewsTitle = $row["TITLE"];
        $recentNewsCategory = $row["CATEGORY"];
        $recentNewsContent = $row["CONTENT"];
        $recentNewsImage = "/news/uploads/" . $row["IMAGE"];
        $recentNewsTime = $row["TIME"];
    }
?>

<link rel="stylesheet" href="../styles/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<div class="bg-gray">
    <div class="container">
        <div class="flex gap-20">
            <div class="right-section">
                <div class="author flex">
                    <div class=""><img class="author-img" src="/news/img/admin.png" alt="author-img"></div>
                    <div>
                        <p class="author-name">Admin</p>
                    </div>
                </div>

                <div class="first-news-heading">
                    <h1><?php echo htmlspecialchars($recentNewsTitle); ?></h1>
                </div>
                <div class="category flex padd-b">
                    <h4><span><i class="fa-solid fa-filter"></i></span> <?php echo htmlspecialchars($recentNewsCategory); ?> </h4>
                    <p class="padd"><span><i class="fa-solid fa-clock"></i></span> <?php echo htmlspecialchars($recentNewsTime); ?> </p>
                </div>

                <div class="first-news-img grid-2">
                    <a href="/news/include/readmore.php?NEWS_ID2=<?php echo $recenetNews_ID ?>"><img src="<?php echo $recentNewsImage ?>" alt="image"></a>
                </div>
            </div>

            <div class="left-section">
                <div class="grid">
                    <?php
                        $query2 = "SELECT * FROM tbl_addnews ORDER BY NEWS_ID DESC LIMIT 3 OFFSET 1";
                        $data2 = pg_query($conn, $query2);

                        if (!$data2) {
                            die("Error in query2: " . pg_last_error($conn));
                        }

                        while ($row2 = pg_fetch_assoc($data2)) {
                            $recentNewsTitle2 = substr($row2["TITLE"], 0, 100);
                            $recentNewsCategory2 = $row2["CATEGORY"];
                            $recenetNews_ID2 = $row2["NEWS_ID"];
                            $recentNewsContent2 = substr($row2["CONTENT"], 0, 100) . " <a href='/news/include/readmore.php?NEWS_ID2=" . $row2["NEWS_ID"] . "'>... Read more</a>";
                            $recentNewsImage2 = "/news/uploads/" . $row2["IMAGE"];
                            $recentNewsTime2 = $row2["TIME"];
                    ?>

                    <div class="f-col">
                        <h3><?php echo htmlspecialchars($recentNewsTitle2); ?></h3>
                        <p><?php echo $recentNewsContent2; ?></p>
                        <div class="category flex">
                            <h4><span><i class="fa-solid fa-filter"></i></span> <?php echo htmlspecialchars($recentNewsCategory2); ?></h4>
                            <p class="padd"><span><i class="fa-solid fa-clock"></i></span> <?php echo htmlspecialchars($recentNewsTime2); ?></p>
                        </div>
                    </div>
                    <div class="sec-col">
                        <a href="/news/include/readmore.php?NEWS_ID2=<?php echo $recenetNews_ID2; ?>"><img src="<?php echo $recentNewsImage2 ?>" alt="image"></a>
                    </div>

                    <?php } // End while ?>
                </div>
            </div>
        </div>
    </div>
</div>
