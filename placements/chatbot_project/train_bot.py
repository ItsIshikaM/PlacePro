import nltk
from nltk.chat.util import Chat, reflections

pairs = [
    (r"hi", ["Hello! How can I assist you?"]),
    (r"how to get placed?", ["Work on projects, improve DSA skills, and do internships."]),
    (r"which skills should I learn?", ["Learn Python, Web Development, and AI/ML."]),
]

chatbot = Chat(pairs, reflections)
print("Chatbot is ready! Type 'exit' to end.")

while True:
    user_input = input("You: ")
    if user_input.lower() == "exit":
        break
    response = chatbot.respond(user_input)
    if response:
        print("Bot:", response)
    else:
        print("Bot: I'm not sure about that. Can you ask something else?")
