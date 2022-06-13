dailyreports table
dailyreport questions table


De admin maakt de daily report questions aan deze zijn voor elke gebruiker hetzelfde. Een scheduler maakt voor elke gebruiker dagelijks een nieuwe report aan

reportquestions:

id, timestamps, questions json

reports:

id user_id, filled, questions

ACTIVITIES:

Voor elke dag wordt een een nieuwe activities entry aangemaakt door de scheduler. 

activities table: id, user_id, created_at, updated_at, scaled_activities, main_activities, status (open, filled)

activity_values: id, user_id, created_at, updated_at, scaled_activities, main_activies