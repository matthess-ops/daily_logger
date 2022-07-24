ik wijk af van het crud principe

clienten data

client  user_id, client_id
hasone user  id
hasmany scaled_activity /id,client_id, name
hasmany main_activity /id,client_id, color, name
hasmany activity_result /id, client_id, array(result) = []

hasmany report_question /  id, client_id, name
hasmany report_result / id,client_id , array(questions), array(scores)

scaledActivityController

mainActivityController
activityResultController


https://www.itsolutionstuff.com/post/laravel-8-user-roles-and-permissions-tutorialexample.html

https://www.codecheef.org/article/laravel-gate-and-policy-example-from-scratch

https://www.itsolutionstuff.com/post/laravel-gates-and-policies-tutorial-with-exampleexample.html

https://laravel-school.com/posts/an-introduction-to-laravel-policy-15



