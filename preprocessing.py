import pandas as pd
import string
from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
from Sastrawi.StopWordRemover.StopWordRemoverFactory import StopWordRemoverFactory


stemmer = StemmerFactory().create_stemmer()
remover = StopWordRemoverFactory().create_stop_word_remover()


def preprocessing(input_text):
            
    for character in string.punctuation:
        input_text = input_text.replace(character, "")

    text_stemmed = stemmer.stem(input_text)

    text_clean = remover.remove(text_stemmed)
    
    return text_clean
    

if __name__ == "__main__":
    data = pd.read_csv('../files/clean_empty_sentiment_training.csv')
    data["preprocessing_result"] = data.apply(lambda row: preprocessing(row.mentah), axis=1)
    data.to_csv('id-preprocess.csv')
