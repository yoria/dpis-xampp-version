import os
import mysql.connector
import requests
import sys

API_KEY = os.environ['API_KEY']
BASE_URL = 'https://www.googleapis.com/youtube/v3'
CHANNEL_ID = sys.argv[1]
BRANCH = sys.argv[2]
quota_used = 0

conn = mysql.connector.connect(
    host = 'localhost',
    port = 3306,
    user = 'youtube_user',
    password = 'youtube_pass',
    database = 'channel_id',
)
cur = conn.cursor()



try:
    cur.execute("SELECT * FROM channel WHERE channel_id = '%s'" % CHANNEL_ID)
    print(cur.fetchall()[0])
    print('既に登録済み')
except:
    if BRANCH == '0' : #(DB)channel_id_infoにチャンネル情報を入れる
        channel_sql = 'insert into channel (id, channel_id, title, thumbnails) values (%s, %s, %s, %s);'
        url = BASE_URL + '/channels?part=snippet&id=%s&key=%s'
        response = requests.get(url % (CHANNEL_ID, API_KEY))
        if response.status_code == 200: #チャンネルIDが実在しているとき
            quota_used += 2
            result = response.json()
            data = (None, CHANNEL_ID, result['items'][0]['snippet']['title'], result['items'][0]['snippet']['thumbnails']['high']['url'])
            cur.execute(channel_sql, data)
            conn.commit()
            print('チャンネル登録完了')
        else:
            print('存在しないチャンネル')



    if BRANCH == '0': #videoに全動画を入れる

        video_sql = 'insert into video (id, channel_id, video_id, title, thumbnails, time, length) values (%s, %s, %s, %s, %s, %s, %s);'
        thum = 'hqdefault.jpg'  #とりあえずハイを入れておく。あとから高画質なサムネにする。あまりにも処理時間が長いため
        videos_url = BASE_URL + '/activities?part=snippet,contentDetails&channelId=%s&key=%s&maxResults=50'
        lengths_url = BASE_URL + '/videos?part=contentDetails&id=%s&key=%s'
        videos_res = requests.get(videos_url % (CHANNEL_ID, API_KEY))
        lengths = []

        if videos_res.status_code != 200:
            print('存在しないチャンネルのため、動画をインサートできませんでした')
        else:
            while True:
                videos_res = requests.get(videos_url % (CHANNEL_ID, API_KEY))
                quota_used += 5
                videos_result = videos_res.json()

                for video in videos_result['items']:
                    try:
                        lengths.append(video['contentDetails']['upload']['videoId'])
                    except:
                        pass
                
                lengths_res = requests.get(lengths_url % (','.join(lengths), API_KEY))
                quota_used += 3
                lengths_result = lengths_res.json()

                for video, length in zip(videos_result['items'], lengths_result['items']):
                    try:
                        data = (None, CHANNEL_ID, video['contentDetails']['upload']['videoId'], video['snippet']['title'], thum, video['snippet']['publishedAt'], length['contentDetails']['duration'])
                        cur.execute(video_sql, data)
                        conn.commit()
                    except:
                        pass
                try:
                    final_video = videos_result['items'][49]['snippet']['publishedAt']
                    videos_url = BASE_URL + '/activities?part=snippet,contentDetails&channelId=%s&key=%s&maxResults=50&     =' + final_video
                    lengths.clear()
                except:
                    print('動画インサート完了')
                    print(quota_used)
                    break



    if BRANCH == "2": #チャンネル登録者数
        CHANNEL_ID = sys.argv[1]
        url = base_url + '/channels?part=statistics&id=%s&key=%s'
        response = requests.get(url % (CHANNEL_ID, API_KEY))
        result = response.json()
        print(result["items"][0]["statistics"]["subscriberCount"])
        print(result["items"][0]["statistics"]["videoCount"])

cur.close()
conn.close()