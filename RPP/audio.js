function fala1(){
    const audio=new SpeechSynthesisUtterance("How are you? Very well. And you?");
    audio.pitch=1;
    audio.rate=1;
    window.speechSynthesis.speak(audio)
}
function fala2(){
    const audio=new SpeechSynthesisUtterance("Where are you from? I'm from");
    audio.pitch=1;
    audio.rate=1;
    window.speechSynthesis.speak(audio)
}
function fala3(){
    const audio=new SpeechSynthesisUtterance("What's your name? My name is");
    audio.pitch=1;
    audio.rate=1;
    window.speechSynthesis.speak(audio)
}
function fala4(){
    const audio=new SpeechSynthesisUtterance("Nice to meet you");
    audio.pitch=1;
    audio.rate=1;
    window.speechSynthesis.speak(audio)
}
