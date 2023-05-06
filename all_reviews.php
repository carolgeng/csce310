<!-- Annie Ren, entire file -->

<!-- Description:
        shows table of all reviews
        gives customer type users ability to add reviews, delete and edit their own reviews
        gives admins ability to delete reviews-->

<?php
session_start();
    include("db.php");
    include("header.php");


    // get user data
    $user_data = check_login($conn);
    if (!empty($_GET['type']) && !empty($_GET['id'])) {
        change_type($conn, $_GET['id'], $_GET['type']);
    }
?>

<!DOCTYPE html>

<section class="all-posts">

   <div class="heading"><h1>Reviews</h1></div>

    <!-- show add review functionality only if user type is a customer -->

   <div class="box-container">
    <?php if ($user_data['type'] == 'customer'){?>
   <div class="heading"> <a href="add_review.php?>" class="inline-btn" style="margin-top: 0;">Add Review</a></div>
   <?php } ?>
</br>
   <!-- <?php 
            $sql = "SELECT * FROM `reviews`"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){

            $review_id = $row['review_id'];
            $user_id = $row['user_id'];
            $item_id = $row['item_id'];
            $item_info = get_item($conn,$item_id);
            $item_name = $item_info['item_name'];
            $date = $row['review_date'];
            $description = $row['description'];
            $rating = $row['rating'];
            $url = $row['url'];
            // Display the review data
            echo "<p>Review by User #{$user_id}<p>";
            echo "<p>Rating: {$rating}</p>";
            echo "<p>Description: {$description}</p>";
            echo"</br>";
            
            }
    ?> -->

<div class="container">
            <table class="table table-hover">
                <tbody>
                    <?php
                        $query = "SELECT * FROM `reviews`"; 
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <thead class="table-dark">
                            <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Description</th>
        
                            </tr>
                            </thead>
                            <tr>
                            <td><?php echo $row['user_id'] ?></td>
                            <td><?php echo $item_name ?></td>
                            <td><?php echo $row['rating'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td>

                            <!--Show edit and delete options only if it is review the user posted -->
                            <!-- Show delete options if user is an admin -->

                            <?php if ($user_data['user_id'] == $user_id || $user_data['type'] == 'admin'){?>
                            <a class="btn btn-dark" href="delete_review.php?id=<?php echo $row['review_id']?>">Delete</a>

                            <?php } ?>

                            <?php if ($user_data['user_id'] == $user_id){?>
                            <a class="btn btn-dark" href="update_review.php?id=<?php echo $row['review_id']?>">Edit</a>
                            <?php }?>
                            </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
                </table>
</div>

   </div>



</section>
