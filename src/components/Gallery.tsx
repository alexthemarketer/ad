import React, { useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { X, ChevronLeft, ChevronRight } from 'lucide-react';

const Gallery = () => {
  const [selectedImage, setSelectedImage] = useState<number | null>(null);

  const galleryImages = [
    {
      src: '/src/assets/kag5o7qmrlnykibmmf2a.png',
      alt: 'Recepção elegante da clínica',
      category: 'Ambiente'
    },
    {
      src: 'https://images.pexels.com/photos/3757942/pexels-photo-3757942.jpeg?auto=compress&cs=tinysrgb&w=800&h=600&fit=crop',
      alt: 'Sala de tratamento facial',
      category: 'Tratamentos'
    },
    {
      src: 'https://images.pexels.com/photos/3985163/pexels-photo-3985163.jpeg?auto=compress&cs=tinysrgb&w=800&h=600&fit=crop',
      alt: 'Ambiente de relaxamento',
      category: 'Ambiente'
    },
    {
      src: 'https://images.pexels.com/photos/3985162/pexels-photo-3985162.jpeg?auto=compress&cs=tinysrgb&w=800&h=600&fit=crop',
      alt: 'Detalhes da decoração',
      category: 'Detalhes'
    },
    {
      src: 'https://images.pexels.com/photos/3757943/pexels-photo-3757943.jpeg?auto=compress&cs=tinysrgb&w=800&h=600&fit=crop',
      alt: 'Sala de massagem',
      category: 'Tratamentos'
    },
    {
      src: 'https://images.pexels.com/photos/3985164/pexels-photo-3985164.jpeg?auto=compress&cs=tinysrgb&w=800&h=600&fit=crop',
      alt: 'Área de descanso',
      category: 'Ambiente'
    },
    {
      src: 'https://images.pexels.com/photos/4041392/pexels-photo-4041392.jpeg?auto=compress&cs=tinysrgb&w=800&h=600&fit=crop',
      alt: 'Produtos de tratamento',
      category: 'Produtos'
    },
    {
      src: 'https://images.pexels.com/photos/3985165/pexels-photo-3985165.jpeg?auto=compress&cs=tinysrgb&w=800&h=600&fit=crop',
      alt: 'Espaço zen',
      category: 'Ambiente'
    }
  ];

  const nextImage = () => {
    if (selectedImage !== null) {
      setSelectedImage((selectedImage + 1) % galleryImages.length);
    }
  };

  const prevImage = () => {
    if (selectedImage !== null) {
      setSelectedImage(selectedImage === 0 ? galleryImages.length - 1 : selectedImage - 1);
    }
  };

  return (
    <section id="gallery" className="py-20 bg-gradient-to-b from-white to-cream-50">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
          className="text-center mb-16"
        >
          <span className="text-gold-600 font-medium text-sm uppercase tracking-wider">Nossa Galeria</span>
          <h2 className="font-serif text-4xl lg:text-5xl font-bold text-sage-800 mt-2 mb-6">
            Conheça nosso
            <span className="block text-gold-600">Espaço</span>
          </h2>
          <p className="text-lg text-sage-600 max-w-2xl mx-auto">
            Um ambiente cuidadosamente projetado para proporcionar serenidade, conforto e uma experiência única 
            de bem-estar em cada visita.
          </p>
        </motion.div>

        {/* Gallery Grid */}
        <motion.div
          initial={{ opacity: 0 }}
          whileInView={{ opacity: 1 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
          className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4"
        >
          {galleryImages.map((image, index) => (
            <motion.div
              key={index}
              className={`relative overflow-hidden rounded-lg cursor-pointer group ${
                index === 0 ? 'md:col-span-2 md:row-span-2' : ''
              }`}
              whileHover={{ scale: 1.02 }}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              transition={{ delay: index * 0.1, duration: 0.6 }}
              viewport={{ once: true }}
              onClick={() => setSelectedImage(index)}
            >
              <img
                src={image.src}
                alt={image.alt}
                className={`w-full object-cover transition-transform duration-300 group-hover:scale-110 ${
                  index === 0 ? 'h-96 md:h-full' : 'h-64'
                }`}
              />
              <div className="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <div className="absolute bottom-4 left-4 text-white">
                  <span className="text-xs bg-white/20 backdrop-blur-sm px-2 py-1 rounded-full">
                    {image.category}
                  </span>
                  <p className="mt-2 font-medium">{image.alt}</p>
                </div>
              </div>
            </motion.div>
          ))}
        </motion.div>

        {/* Lightbox */}
        <AnimatePresence>
          {selectedImage !== null && (
            <motion.div
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              exit={{ opacity: 0 }}
              className="fixed inset-0 z-50 bg-black/90 flex items-center justify-center p-4"
              onClick={() => setSelectedImage(null)}
            >
              <motion.div
                initial={{ scale: 0.8, opacity: 0 }}
                animate={{ scale: 1, opacity: 1 }}
                exit={{ scale: 0.8, opacity: 0 }}
                className="relative max-w-4xl max-h-full"
                onClick={(e) => e.stopPropagation()}
              >
                <img
                  src={galleryImages[selectedImage].src}
                  alt={galleryImages[selectedImage].alt}
                  className="max-w-full max-h-full object-contain rounded-lg"
                />
                
                {/* Close Button */}
                <button
                  className="absolute top-4 right-4 bg-white/20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-white/30 transition-colors duration-200"
                  onClick={() => setSelectedImage(null)}
                >
                  <X size={24} />
                </button>

                {/* Navigation Buttons */}
                <button
                  className="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-white/30 transition-colors duration-200"
                  onClick={prevImage}
                >
                  <ChevronLeft size={24} />
                </button>
                <button
                  className="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-sm text-white p-2 rounded-full hover:bg-white/30 transition-colors duration-200"
                  onClick={nextImage}
                >
                  <ChevronRight size={24} />
                </button>

                {/* Image Info */}
                <div className="absolute bottom-4 left-4 text-white">
                  <span className="text-sm bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">
                    {galleryImages[selectedImage].category}
                  </span>
                  <p className="mt-2 font-medium">{galleryImages[selectedImage].alt}</p>
                  <p className="text-sm opacity-75">
                    {selectedImage + 1} de {galleryImages.length}
                  </p>
                </div>
              </motion.div>
            </motion.div>
          )}
        </AnimatePresence>

        {/* CTA Section */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
          className="mt-16 text-center"
        >
          <h3 className="font-serif text-2xl font-semibold text-sage-800 mb-4">
            Venha nos conhecer pessoalmente
          </h3>
          <p className="text-sage-600 mb-6">
            Agende uma visita e conheça nosso espaço exclusivo projetado para o seu bem-estar.
          </p>
          <motion.button
            className="bg-gold-500 hover:bg-gold-600 text-white px-8 py-3 rounded-full font-semibold transition-colors duration-200"
            whileHover={{ scale: 1.05 }}
            whileTap={{ scale: 0.95 }}
            onClick={() => document.querySelector('#contact')?.scrollIntoView({ behavior: 'smooth' })}
          >
            Agendar Visita
          </motion.button>
        </motion.div>
      </div>
    </section>
  );
};

export default Gallery;