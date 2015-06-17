# no adblock
adblock 사용을 제한하는 애드온 입니다.

광고 수익으로 운영되는 웹사이트에서 임의로 광고를 차단하는것은, 웹사이트의 서버 자원을 무상으로 사용하겠다는 의사를 표현한 것이라 생각합니다.

본 애드온은 adblock을 사용하는지를 체크하여, adblock 사용 통계 및 adblock 사용시 관련된 안내 메시지를 내보낼 수 있도록 도와줍니다.

운영하시는 웹사이트 정책에 맞게 애드온 설치하시면 도움이 될거에요.


### 기능
- Google Analytics와 연계하여 Adblock을 사용할 경우 event를 전송하여, adblock 사용자에 대한 통계를 낼 수 있습니다.
- adblock을 사용하는 유저에게 애드온에 내장된 modal 창을 이용하여 경고 메시지를 보여주거나, 원하는 js를 실행 할 수 있습니다.
- 세션 별로(접속자별로) XE와 유사한 형태의 Random URL을 https://example.com/?mid=random&document_srl=random ... 생성하여, adblock에서 url 검사만으로 막을 수 없도록 처리했습니다.
- 각 random url은 접속(세션)별 1회 생성 후 브라우져상에서 캐시를 하도록 하였기에, v1.0.0 대비 서버의 부담이 크게 줄어들었습니다.

### 주의사항
이 애드온은 현 시점(2015년 6월)에서 adblock, ublock 등의 광고 차단 프로그램을 문제없이 검출해내고 있으나, 추후 광고 차단 프로그램의 대응에 따라 본 애드온이 정상적으로 작동하지 않을 수 있습니다.

실제 사례로 애드온에서 사용하는 라이브러리인 fuckadblock.js 가 널리 퍼지면서, 광고차단프로그램이 https://example.com/path/to/ **fuckadblock.js** 형태의 파일을 무조건적으로 차단하고 있습니다.
 
따라서 반드시 광고차단프로그램을 정상적으로 검출해내고 있는지 주기적으로 확인이 필요합니다.

(문제 발생시 이슈트래커에 이슈를 남겨 주세요. 가능한 선에서 개선하도록 하겠습니다. 또한 애드온이 유지보수 되는 동안 업데이트가 나올 경우 변경내역을 확인후 빠르게 업데이트를 하시는것을 권장합니다.)  


#### 요구사항
PHP 5.2+ , XE1.7 이상이면 모두 정상작동 할 것으로 생각합니다.
다만 개발 및 테스트는 PHP 5.5 + XE1.8 에서만 진행하였으니, 이용하시는 분들의 유의가 필요합니다.


### 라이센스
MIT
The MIT License (MIT)

Copyright (c) 2015 AJKJ <thename@requery.me>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.




#### 본 애드온에 사용된 라이브러리 및 라이센스
 https://github.com/sitexw/FuckAdBlock
 
 The MIT License (MIT)
 
 Copyright (c) 2015 Valentin Allaire <valentin.allaire@sitexw.fr>
 
 Permission is hereby granted, free of charge, to any person obtaining a copy
 of this software and associated documentation files (the "Software"), to deal
 in the Software without restriction, including without limitation the rights
 to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the Software is
 furnished to do so, subject to the following conditions:
 
 The above copyright notice and this permission notice shall be included in all
 copies or substantial portions of the Software.
 
 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 SOFTWARE.