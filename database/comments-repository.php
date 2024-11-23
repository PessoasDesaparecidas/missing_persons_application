<?php
function create_comment($connection, $missing_id, $user_id, $content, $latitude, $longitude)
{
    $preparement_query_to_created_comment = $connection->prepare(
        "INSERT INTO Comment (missing_person_id, user_id, content, latitude, longitude)
         VALUES (?, ?, ?, ?, ?)"
    );
    $preparement_query_to_created_comment->bind_param("sssss", $missing_id, $user_id, $content, $latitude, $longitude);
    $preparement_query_to_created_comment->execute();
    $preparement_query_to_created_comment->close();
}

function update_comment($connection, $comment_id, $content, $latitude, $longitude)
{
    $preparement_query_to_update_comment = $connection->prepare("UPDATE Comment SET 
    content = ? 
    latitude = ?
    longitude = ?
    WHERE comment_id = ?");
    $preparement_query_to_update_comment->bind_param("ssss", $content, $latitude, $longitude, $comment_id);
    $preparement_query_to_update_comment->execute();
    $preparement_query_to_update_comment->close();
}


function fetch_comments_by_missing_id($connection, $missing_id)
{
    $preparement_query_to_fetch_comments = $connection->prepare(
        "SELECT Comment.*, User.username as author_name , User.user_photo as  author_image_url
        FROM Comment 
        JOIN User ON Comment.user_id = User.user_id 
        WHERE Comment.missing_person_id = ?
        "
    );
    $preparement_query_to_fetch_comments->bind_param("i", $missing_id);
    $preparement_query_to_fetch_comments->execute();

    $result = $preparement_query_to_fetch_comments->get_result();

    return $result;
}

function delete_comment($connection, $comment_id)
{
    $preparement_query_to_delete_comment = $connection->prepare("DELETE FROM Comment WHERE comment_id = ?");
    $preparement_query_to_delete_comment->bind_param("s", $comment_id);
    $preparement_query_to_delete_comment->execute();
    $preparement_query_to_delete_comment->close();
}

function delete_all_comment_by_missing_id($connection, $missing_id)
{
    $preparement_query_to_update_comment = $connection->prepare("DELETE FROM Comment WHERE missing_person_id = ?");
    $preparement_query_to_update_comment->bind_param("s", $missing_id);
    $preparement_query_to_update_comment->execute();
}

function delete_all_comment_by_user_id($connection, $user_id)
{
    $preparement_query_to_update_comment = $connection->prepare("DELETE FROM Comment WHERE user_id = ?");
    $preparement_query_to_update_comment->bind_param("s", $user_id);
    $preparement_query_to_update_comment->execute();
}

function delete_all_comments($connection)
{
    $preparement_query_to_delete_all_comments = $connection->prepare("DELETE FROM Comment");
    $preparement_query_to_delete_all_comments->execute();
    $preparement_query_to_delete_all_comments->close();
}