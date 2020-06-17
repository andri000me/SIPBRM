const Telegram = require('node-telegram-bot-api');
var axios = require('axios')
const token = '1048537149:AAEjn0E8xMhUGna-q48mtk0-M3GfDxcT-_I'
const ksatria_bot = new Telegram(token, { polling: true });
var express = require('express')
var app = express()
var bodyParser = require('body-parser')

app.use(bodyParser.json()) // for parsing application/json
app.use(
  bodyParser.urlencoded({
    extended: true
  })
)
// ksatria_bot.onText(/\/start/, function onEchoText(msg, match) {
//     // 'msg' is the received Message from Telegram
//     // 'match' is the result of executing the regexp above on the text content
//     // of the message
  
//     const chatId = msg.chat.id;
//     const resp = match[1]; // the captured "whatever"
  
//     // send back the matched "whatever" to the chat
//     ksatria_bot.sendMessage(chatId, resp);
//   });

ksatria_bot.onText(/\/start/, function onEchoText(msg, match) {
    ksatria_bot.sendMessage(msg.chat.id, "Silahkan Login");
    ksatria_bot.on('message', function(msg) {
            var chatId = msg.chat.id;
            var data = msg.text.concat("_"+chatId);
          axios.get('http://192.168.1.6/SIPBRM/api/loginTelegram/'+data)
            .then(result => 
                // console.log(result)
                ksatria_bot.sendMessage(chatId, result.data.message)
                )
            .catch(err => 
                ksatria_bot.sendMessage(chatId, "Chat Error "+err)
                )
        //   // If we've gotten this far, it means that we have received a message containing the word "marco".
        //   // Respond by hitting the telegram bot API and responding to the approprite chat_id with the word "Polo!!"
        //   // Remember to use your own API toked instead of the one below  "https://api.telegram.org/bot<your_api_token>/sendMessage"
        })
  });
  ksatria_bot.onText(/\/end/, function onEchoText(msg, match) {
    ksatria_bot.sendMessage(msg.chat.id, "Berhasil Keluar");
  });