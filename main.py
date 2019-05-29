#!/usr/bin/env python
from pytube import YouTube
import sys
print('....Video Downloading....')
YouTube(sys.argv[1]).streams.first().download('videos')
print('DONE!')
