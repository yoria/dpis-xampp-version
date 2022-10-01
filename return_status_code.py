import sys
import requests

video_id = sys.argv[1]
response = requests.get("https://i.ytimg.com/vi/" + video_id + "/maxresdefault.jpg")
if(response.status_code == 200):
    print(0)
else:
    print(1)