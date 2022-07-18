rapportages client stuff

-db table client_reports
-create an migration and seed
-migration user_id, first_filled (check when the client first filled the report)
datetime (01-01-22),
done (check if the daily report is fully filled)
questions (json array of the questions that needs to be filled)
- dialy report blade -> list of the last 5 daily reports plus if they are already filled or not
- 

daily-report index van maken
show the last 5 daily reports list and if they are totally filled or not etc etc
show an edit page






activity logger:

24 x4 checkboxes. Elke check box is 15 min. Elke check box heeft de state van
activity values. Aka 1 main value en een aantal scaled values. De scheduler
maakt een aantal activity_logs aan. Elk activity_log is een array van



id
user_id
created_at
updated_at
activities = [[id:1, main_activity: werken, scaledactivities:[humeur:8,stemming:9]], x 96]

Als de client naar activity logger heen gaat return de activity_log van vandaag plus de activity_values van de client

activity_values

id
user_id
created_at
updated_at
main_activities [werken, koken, lopen]
scaled_activities = [humeur, blijheid etc]
main_activities_colors: [red, blue, green] // zelfde size











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